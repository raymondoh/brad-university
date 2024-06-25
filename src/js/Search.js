class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML(); // Ensure the search HTML is added to the DOM first
    this.resultsDiv = document.querySelector("#search-overlay__results");
    this.openButton = document.querySelectorAll(".js-search-trigger");
    this.closeButton = document.querySelector(".search-overlay__close");
    this.searchOverlay = document.querySelector(".search-overlay");
    this.searchField = document.querySelector("#search-term");
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue = "";
    this.typingTimer = null;
    this.events();
  }

  // 2. events
  events() {
    if (this.openButton) {
      this.openButton.forEach((button) => {
        button.addEventListener("click", this.openOverlay.bind(this));
      });
    }

    if (this.closeButton) {
      this.closeButton.addEventListener("click", this.closeOverlay.bind(this));
    }

    if (this.searchField) {
      this.searchField.addEventListener("keyup", this.typingLogic.bind(this));
    }

    document.addEventListener("keydown", this.keyPressDispatcher.bind(this));
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.value) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>';
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      } else {
        this.resultsDiv.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }

    this.previousValue = this.searchField.value;
  }
  // ORIGINAL getResults() method
  // getResults() {
  //   const postsUrl = `${bradData.root_url}/wp-json/wp/v2/posts?search=${this.searchField.value}`;
  //   const pagesUrl = `${bradData.root_url}/wp-json/wp/v2/pages?search=${this.searchField.value}`;
  //   const eventsUrl = `${bradData.root_url}/wp-json/wp/v2/event?search=${this.searchField.value}`; // URL for "event" CPT
  //   const professorsUrl = `${bradData.root_url}/wp-json/wp/v2/professor?search=${this.searchField.value}`; // URL for "professor" CPT
  //   const programsUrl = `${bradData.root_url}/wp-json/wp/v2/program?search=${this.searchField.value}`; // URL for "program" CPT

  //   Promise.all([
  //     fetch(postsUrl).then((response) => response.json()),
  //     fetch(pagesUrl).then((response) => response.json()),
  //     fetch(eventsUrl).then((response) => response.json()), // Fetch the events data
  //     fetch(professorsUrl).then((response) => response.json()), // Fetch the professors data
  //     fetch(programsUrl).then((response) => response.json()), // Fetch the programs data
  //   ])
  //     .then(([posts, pages, events, professors, programs]) => {
  //       const combinedResults = posts.concat(
  //         pages,
  //         events,
  //         professors,
  //         programs,
  //       ); // Combine the results from all three fetches
  //       this.resultsDiv.innerHTML = `
  //         <h2 class="search-overlay__section-title">General Information</h2>
  //         ${combinedResults.length ? '<ul class="link-list min-list">' : "<p>No general information matches that search.</p>"}
  //           ${combinedResults.map((item) => `<li><a href="${item.link}">${item.title.rendered}</a> ${item.type === "post" ? `by ${item.author_name}` : ""}</li>`).join("")}
  //         ${combinedResults.length ? "</ul>" : ""}
  //       `;
  //       this.isSpinnerVisible = false;
  //     })
  //     .catch(() => {
  //       this.resultsDiv.innerHTML =
  //         "<p>Unexpected error; please try again.</p>";
  //     });
  // }

  // NEW getResults() method with custom REST API endpoint and highlighting
  getResults() {
    const searchTerm = this.searchField.value;
    const searchUrl = `${bradData.root_url}/wp-json/brad/v1/search?term=${searchTerm}`;

    // Function to highlight search term
    const highlight = (text, term) => {
      const regex = new RegExp(`(${term})`, "gi");
      return text.replace(regex, "<mark>$1</mark>");
    };

    fetch(searchUrl)
      .then((response) => response.json())
      .then((results) => {
        this.resultsDiv.innerHTML = `
          <h2 class="search-overlay__section-title">General Information</h2>
          ${results.generalInfo.length ? '<ul class="link-list min-list">' : "<p>No general information matches that search.</p>"}
            ${results.generalInfo.map((item) => `<li><a href="${item.permalink}">${highlight(item.title, searchTerm)}</a></li>`).join("")}
          ${results.generalInfo.length ? "</ul>" : ""}
  
          <h2 class="search-overlay__section-title">Professors</h2>
          ${results.professors.length ? '<ul class="link-list min-list">' : "<p>No professors match that search.</p>"}
            ${results.professors.map((item) => `<li><a href="${item.permalink}">${highlight(item.title, searchTerm)}</a></li>`).join("")}
          ${results.professors.length ? "</ul>" : ""}
  
          <h2 class="search-overlay__section-title">Programs</h2>
          ${results.programs.length ? '<ul class="link-list min-list">' : "<p>No programs match that search.</p>"}
            ${results.programs.map((item) => `<li><a href="${item.permalink}">${highlight(item.title, searchTerm)}</a></li>`).join("")}
          ${results.programs.length ? "</ul>" : ""}
  
          <h2 class="search-overlay__section-title">Events</h2>
          ${results.events.length ? '<ul class="link-list min-list">' : "<p>No events match that search.</p>"}
            ${results.events.map((item) => `<li><a href="${item.permalink}">${highlight(item.title, searchTerm)}</a></li>`).join("")}
          ${results.events.length ? "</ul>" : ""}
  
          <h2 class="search-overlay__section-title">Campuses</h2>
          ${results.campuses.length ? '<ul class="link-list min-list">' : "<p>No campuses match that search.</p>"}
            ${results.campuses.map((item) => `<li><a href="${item.permalink}">${highlight(item.title, searchTerm)}</a></li>`).join("")}
          ${results.campuses.length ? "</ul>" : ""}
  
          <h2 class="search-overlay__section-title">Related Programs</h2>
          ${results.relatedPrograms.length ? '<ul class="link-list min-list">' : "<p>No related programs found.</p>"}
            ${results.relatedPrograms.map((item) => `<li><a href="${item.permalink}">${highlight(item.title, searchTerm)}</a></li>`).join("")}
          ${results.relatedPrograms.length ? "</ul>" : ""}
        `;
        this.isSpinnerVisible = false;
      })
      .catch(() => {
        this.resultsDiv.innerHTML =
          "<p>Unexpected error; please try again.</p>";
      });
  }

  keyPressDispatcher(e) {
    if (
      e.keyCode == 83 &&
      !this.isOverlayOpen &&
      !["INPUT", "TEXTAREA"].includes(document.activeElement.tagName)
    ) {
      this.openOverlay();
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    if (this.searchOverlay) {
      this.searchOverlay.classList.add("search-overlay--active");
    }
    document.body.classList.add("body-no-scroll");

    // Clear the search field
    if (this.searchField) {
      this.searchField.value = "";
    }

    // Delay focus to ensure overlay is fully open
    setTimeout(() => {
      if (this.searchField) {
        this.searchField.focus();
      }
    }, 300);

    console.log("our open method just ran!");
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    if (this.searchOverlay) {
      this.searchOverlay.classList.remove("search-overlay--active");
    }
    document.body.classList.remove("body-no-scroll");
    console.log("our close method just ran!");
    this.isOverlayOpen = false;
  }

  addSearchHTML() {
    const searchHTML = `
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa-solid fa-magnifying-glass search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term" autocomplete="off">
            <i class="fa-solid fa-xmark search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>
        
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>
      </div>
    `;
    document.body.insertAdjacentHTML("beforeend", searchHTML);
  }
}

export default Search;

class Filter {
    constructor() {
        this.isCatChanged = false;
        this.filterBTNS = document.querySelectorAll("#filterDiv button");
        this.cards = Array.from(document.querySelectorAll(".card"));
        this.filterdBy = document.querySelector(".filterdby .box");
        this.filterDiv = document.getElementById('filterDiv');
        this.filterButton = document.getElementById('filterButton');
        this.filterLinksContainer = document.querySelector('.filter-links');

        this.init();
        this.addEventListeners();
    }

    showAllItems() {
        this.removeActiveClass();
        console.log('zurück gesetzt');
        this.isCatChanged = false;
        const resetButton = document.getElementById('resetFilter');
        if (resetButton) resetButton.remove();

        this.cards.forEach(card => {
            card.style.display = '';
        });
        this.init();
    }

    addFilterLinkAtStart() {
        if (this.isCatChanged) return;
        const newElement = document.createElement('button');
        newElement.id = 'resetFilter';
        newElement.className = 'resetFilter filter-link';
        newElement.textContent = 'Alle Anzeigen';
        newElement.addEventListener('click', () => this.showAllItems());

        if (this.filterLinksContainer) {
            this.filterLinksContainer.insertBefore(newElement, this.filterLinksContainer.firstChild);
        } else {
            console.error('Element mit dem Selektor .filter-links nicht gefunden.');
        }
    }

    addEventListeners() {
        this.filterButton.addEventListener('click', () => {
            this.filterDiv.classList.toggle('hidden');
        });

        this.filterDiv.addEventListener('click', (event) => {
            const button = event.target.closest('button');
            if (button && this.filterDiv.contains(button)) {
                const cls = button.getAttribute('data-filter');
                this.removeActiveClass();
                button.classList.add('active');
                this.displayOnlyFiltered(cls);

                const CatName = button.innerHTML;
                const CatQuanty = this.countByClassName(cls);
                this.filterdBy.innerHTML = `${CatQuanty} ${CatQuanty === 1 ? 'Eintrag' : 'Einträge'} zu <b>${CatName}</b>`;

                this.addFilterLinkAtStart();
                this.isCatChanged = true;
            }
        });
    }

    displayOnlyFiltered(className) {
        this.cards.forEach(card => {
            card.style.display = card.classList.contains(className) ? '' : 'none';
        });
    }

    removeActiveClass() {
        this.filterBTNS.forEach(btn => {
            btn.classList.remove('active');
        });
    }

    countByClassName(className) {
        return this.cards.filter(card => card.classList.contains(className)).length;
    }

    init() {
        this.filterdBy.innerHTML = `Alle ${this.cards.length} Einträge`;
    }
}

document.addEventListener('DOMContentLoaded', () => new Filter());

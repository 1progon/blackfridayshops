let wholePage = '#whole-page';
let wholePageApp = new Vue({
    el: wholePage,
    data: {
        showAddForm: false,
        showCats: false,
    },
    methods: {
        addShop() {
            this.showAddForm = !this.showAddForm;
            console.log('work', this.showAddForm);
        },
        scrollToActiveCategory() {
            let activeElement = document.querySelector('#categories .active');

            if (activeElement) {
                setTimeout(() => {
                    activeElement.scrollIntoView({behavior: "smooth", block: "center"});
                }, 0);

                setTimeout(() => {
                    activeElement.style.backgroundColor = 'green';
                    activeElement.style.borderColor = 'green';
                    setTimeout(() => {
                        activeElement.removeAttribute('style');
                    }, 700);
                }, 500);
            }
        },
        submitFormAddSite() {
            console.log('submitted')
        }
    },


    mounted: function () {
        this.scrollToActiveCategory();

    }
})

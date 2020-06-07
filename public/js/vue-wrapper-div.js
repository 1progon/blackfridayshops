let wrapper = document.getElementById('wrapper');

let app = new Vue({
    el: wrapper,
    data: {
        showCats: false,
    },
    methods: {
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
        }
    },
    mounted: function () {
        this.scrollToActiveCategory();

    }

})

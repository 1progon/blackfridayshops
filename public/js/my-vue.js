let div = '#app';
let app = new Vue({
    el: div,
    data: {
        isShow: false,
        cats: [],
    },
    methods: {
        getCats() {
            this.isShow = !this.isShow;
            this.sendData('/admitad/cats')
                .then(
                    res => {
                        this.isShow = !this.isShow;
                        return this.cats = res.data.results;
                    },
                    err => console.error(err)
                );
        },

        sendData(uri = null) {
            return axios.get(uri);
        },
    }
})
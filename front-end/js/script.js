const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "http://localhost/boolean/php-dischi-json/back-end/server.php",
      arrayDischi: [],
    };
  },
  created() {
    this.allAlbum();
  },
  methods: {
    allAlbum() {
      // show all Dics
      axios
        .get(this.apiUrl)
        .then((resp) => {
          this.arrayDischi = resp.data.results;
          console.log(resp.data.results);
        });
    },
    onlyLiked() {
      // show only like
      const data = {
        action: "like",
      };
      axios
        .post(this.apiUrl, data, {
          headers: {
            "Content-type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.arrayDischi = resp.data.results;
        });
    },
    addLike(elem) {
    // change like in local array
    this.arrayDischi[elem].like = !this.arrayDischi[elem].like;
      const data = {
        id: elem,
      };
      axios
        .post(this.apiUrl, data, {
          headers: {
            "Content-type": "multipart/form-data",
          },
        })
        .then((resp) => {
          // no resp
        });
    },
  },
}).mount("#app");

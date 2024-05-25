const { createApp } = Vue;

createApp({
  data() {
    return {
      arrayDischi: [],
      active: "",
    };
  },
  created() {
    this.allAlbum();
  },
  methods: {
    allAlbum() {
      // show all Dics
      axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) => {
          this.arrayDischi = resp.data.results;
          console.log(resp.data.results);
        });
    },
    onlyLiked() {
      // show only like
      this.active = "like";
      const data = {
        action: this.active,
      };
      axios
        .post("http://localhost/boolean/php-dischi-json/server.php", data, {
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
        .post("http://localhost/boolean/php-dischi-json/server.php", data, {
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

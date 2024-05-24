const { createApp } = Vue;

createApp({
  data() {
    return {
      arrayDischi: [],
      active: false,
    };
  },
  created() {
    this.allAlbum();
  },
  methods: {
    allAlbum() {
      // show all Dics
      this.active = false;
      axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) => {
          this.arrayDischi = resp.data.results;
          console.log(resp.data.results);
        });
    },
    onlyLiked() {
      // show only like
      this.active = true;
      const data = {
        action: "like",
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
    // "application/x-www-form-urlencoded" usu to send simple text
    
    addLike(elem) {
      //  add or remove like
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
          if (this.active === false) {
            this.arrayDischi = resp.data.results;
          }
        });
    },
  },
}).mount("#app");

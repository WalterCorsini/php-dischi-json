const { createApp } = Vue;

createApp({
    data() {
        return {
            arrayDischi:[],
            id:"",
            like:"",
        }
    },
    created(){
      this.allAlbum();  
    },
    methods:{
      allAlbum(){
        axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) => {
          this.arrayDischi = resp.data.results;
          console.log(resp.data.results);
        });
      },
      onlyLiked(){
        console.log("ciao");
        const data = {
          action: "like",
        };
        axios.post(
          "http://localhost/boolean/php-dischi-json/server.php",
          data,
          {
            headers: {
              "Content-type": "multipart/form-data",
            },
          }
        )
        .then((resp) => {
          this.arrayDischi = resp.data.results;
        });
      },

      addLike(elem){
        
        const data = {
          id: elem,
        };
        axios.post(
          "http://localhost/boolean/php-dischi-json/server.php",
          data,
          {
            headers: {
              "Content-type": "multipart/form-data",
            },
          }
        )
        .then((resp) => {
          this.arrayDischi = resp.data.results;
        });
      }
    }
    }).mount("#app");
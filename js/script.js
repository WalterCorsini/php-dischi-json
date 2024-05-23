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
        axios
        .get("http://localhost/boolean/php-dischi-json/server.php")
        .then((resp) => {
        this.arrayDischi = resp.data.results;
          console.log(resp.data.results);
        });
    },
    methods:{
      addLike(elem){
        elem.like = !elem.like;
        this.id = elem.id;
        
        const data = {
          id: this.id,
          like: true,
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
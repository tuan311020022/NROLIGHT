export default {
  name: "HeaderPage",
  data() {
    return {
      log: 0,
      userName:""
    };
  },
  methods: {
		
	},
  mounted(){
      if(sessionStorage.length !== 0){
        if(sessionStorage['username']){
          this.log = 1;
          this.userName = sessionStorage['username'];
        }
      }
      else{
        this.log = 0;
      }
  }
};

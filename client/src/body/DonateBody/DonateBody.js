

export default {
	name: 'DonateBody',
	data() {
        return {
		Type:"",
		Mount:"",	
        Code:"",
		Series:""
        };
      },
	methods: {
		Donate(){
			console.log(this.Type,this.Mount,this.Code,this.Series);
		}
	}
};

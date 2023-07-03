import $ from "jquery";


export default {
	name: 'LoginBody',
	data() {
        return {
          userName: "",
          passWord: "",
        };
      },
	methods: {
		async signIn(){
      var formData = new FormData();
      formData.append('username', this.userName);
      formData.append('password', this.passWord);
      $.ajax({
        type: "POST",
        url: "/server/signin.php",
        data: formData,
        processData: false,
        contentType: false,
        success(data) {
          let response = JSON.parse(data);
          if(response.check == 1){
            alert("đăng nhập thành công, chào mừng trở lại")
            console.log(response.username);
            sessionStorage.setItem('username', response.username);
            window.location = "https://nroodin.online/";
          }
          else{
            alert("tài khoản hoặc mật khẩu chưa chính xác hoặc chưa tọa nhân vật")
          }
        }
      }
      )
		}
	}
};


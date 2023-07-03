
import $ from "jquery";

export default {
  name: "SignBody",
  data() {
    return {
      userName: "",
      passWord: "",
      rePassWord: "",
    };
  },
  methods: {
		async signUp(){
      if(this.passWord === this.rePassWord){
        var formData = new FormData();
        formData.append('username', this.userName);
        formData.append('password', this.passWord);
        $.ajax({
          type: "POST",
          url: "/server/signup.php",
          data: formData,
          processData: false,
          contentType: false,
          success(data) {
            let response = JSON.parse(data);
            console.log(response);
            if(response.check === 3){
              alert("đăng ký thành công, chào mừng tới ngọc rồng hercules");
              window.location = "https://nroodin.online/";
            }
            else{
              alert("tài khoản đã tồn tại");
            } 
          }
        })
        
      }
      else{
        alert("hai mật khẩu chưa khớp")
      }
		}
	}
};

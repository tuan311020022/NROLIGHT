import $ from "jquery";

export default {
  name: "ChangeBody",
  data() {
    return {
      userName: "",
      passWord: "",
      newPassWord: "",
      reNewPassWord: "",
    };
  },
  methods: {
    async signIn() {
      if (this.newPassWord === this.reNewPassWord) {
        var formData = new FormData();
        formData.append("username", this.userName);
        formData.append("password", this.passWord);
        formData.append("newpass1", this.newPassWord);
        formData.append("newpass2", this.reNewPassWord);
        $.ajax({
          type: "POST",
          url: "/server/changepass.php",
          data: formData,
          processData: false,
          contentType: false,
          success(data) {
			let response = JSON.parse(data);
            console.log(response);
            if (response.check == 3) {
              alert("đổi mật khẩu thành công");
            } else {
              alert("tài khoản hoặc mật khẩu chưa chính xác");
            }
          },
        });
      } else {
        alert("hai mật khẩu chưa khớp");
      }
    },
  },
};

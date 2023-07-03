import $ from "jquery";

export default {
  name: "DonateBody",
  data() {
    return {
      Type: "",
      Mount: "",
      Code: "",
      Series: "",
      Name: sessionStorage["username"],
    };
  },
  methods: {
    async Donate() {
      console.log(this.Type, this.Mount, this.Code, this.Series);
      var formData = new FormData();
      formData.append("idchar", this.Name);
      formData.append("code", this.Code);
      formData.append("serial", this.Series);
      formData.append("amount", this.Mount);
      formData.append("telco", this.Type);
      $.ajax({
        type: "POST",
        url: "/server/recharge.php",
        data: formData,
        processData: false,
        contentType: false,
        success(data) {
          let response = JSON.parse(data);
          console.log(response);
          if (response.check === 1) {
            alert("vui lòng không được để trống");
            console.log(response.username);
          } else if (response.check === 3) {
            alert(
              "giờ chúng tôi sẽ chuyển bạn tới trang chờ check thẻ vui lòng làm theo hướng dẫn"
            );
            sessionStorage.setItem("code", this.Code);
            sessionStorage.setItem("mount", this.Mount);
            sessionStorage.setItem("series", this.Series);
            sessionStorage.setItem("type", this.Type);
            sessionStorage.setItem("sign", response.sign);
            sessionStorage.setItem("key", response.key);
            window.location = "https://nroodin.online/Check";
          } else {
            alert("thẻ đã được nạp trước đó");
          }
        },
      });
    },
  },
};

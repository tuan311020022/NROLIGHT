import $ from "jquery";

export default {
  name: "CheckBody",
  data() {
    return {
      Type: sessionStorage["type"],
      Mount: sessionStorage["mount"],
      Code: sessionStorage["code"],
      Series: sessionStorage["series"],
      Name: sessionStorage["username"],
      sign: sessionStorage["sign"],
      requestId: sessionStorage["key"],
      Status: "Chưa xử lý xong",
    };
  },
  methods: {
    async Check() {
      console.log(this.Type, this.Mount, this.Code, this.Series);
      console.log(this.Type, this.Mount, this.Code, this.Series);
      var formData = new FormData();
      formData.append("idchar", this.Name);
      formData.append("code", this.Code);
      formData.append("serial", this.Series);
      formData.append("amount", this.Mount);
      formData.append("telco", this.Type);
      formData.append("request_id", this.requestId);
      formData.append("sign", this.sign);
      $.ajax({
        type: "POST",
        url: "/server/callback.php",
        data: formData,
        processData: false,
        contentType: false,
        success(data) {
          let response = JSON.parse(data);
          console.log(response);
          if (response.check === 3) {
            alert("nạp thẻ thành công");
            this.Status = response.status;
          } else if (response.check === 1) {
            alert(
              "thẻ vẫn đang chờ xử lý vui lòng chờ chút rồi lặp lại bước trên"
            );
            this.Status = response.status;
          } else {
            alert("thẻ sai hoặc đã được nạp trước đó");
            this.Status = response.status;
          }
        },
      });
    },
  },
};

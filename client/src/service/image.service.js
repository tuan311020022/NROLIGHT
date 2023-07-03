import ApiService from "./api.service";
const ImageService = {
  Log(params) {
    return ApiService.post("/server/signin.php", params);
  },
  Sign(params) {
    return ApiService.post("/server/signup.php", params);
  },
  Change(params) {
    return ApiService.post("/server/changepass.php", params);
  },
  Donate(params) {
    return ApiService.post("/server/recharge.php", params);
  },
  Check(params) {
    return ApiService.post("/server/callback.php", params);
  },
};

export default ImageService;

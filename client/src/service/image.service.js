import ApiService from "./api.service";

// Constant
const baseUrl = 'image/'

const ImageService = {
	add(params){
		return ApiService.post('album/' + 'add',params)
	},
};

export default ImageService;
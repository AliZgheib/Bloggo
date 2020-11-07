class CommentsService {
    async getComments(postId) {
        const resp = await axios.get(`/comment/${postId}`);
        console.log(resp);
        return resp.data.data;
    }

    async addComment(postId, comment_data) {
        var bodyFormData = new FormData();

        bodyFormData.append("comment_data", comment_data);

        axios({
            method: "post",
            url: `/comment/${postId}`,
            data: bodyFormData,
        })
            .then(function (response) {
                //handle success
                console.log(response);
            })
            .catch(function (response) {
                //handle error
                console.log(response);
            });
    }
}

class LikesService {
    async getLikes(postId) {
        const resp = await axios.get(`/likes/${postId}`);
        return resp.data.data;
    }

    async checkStatus(postId) {
        const resp = await axios.get(`/like/${postId}`);
        console.log(resp);
        return resp.data;
    }

    async updateStatus(postId) {
        const resp = await axios.post(`/like/${postId}`);
        console.log(resp);

        return resp.data.data;
    }
}

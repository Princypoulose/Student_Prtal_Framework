function process_form(){
     // Get the form element
        var form = document.querySelector('form');

        // Create an instance of FormData
        var formData = new FormData(form);

        // Convert formData to JSON
        var formObject = {};
        formData.forEach(function(value, key) {
            formObject[key] = value;
        });
        return formObject
}
async function fetch(path, method, data){
    try {
        var headers = {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin' : '*'
            }
        const response = await axios({
            method: method,
            url: `http://127.0.0.1:5001/${path}`,
            data: JSON.stringify(data),
            headers: headers
        });
        // Returns response data as object
        return response.data;
    } catch(error) {
        // Handle error here
        if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            console.log(error.response.data.message);
            axios.post('/flash-error', {errorMessage: error.response.data.message})
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        } else if (error.request) {
            // The request was made but no response was received
            console.log(error.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', error.message);
        }
        console.log(error.config);
    }
}
async function login(e) {
    e.preventDefault();

    const formObject = process_form();

    try {
        const response = await fetch('student/login', 'post', formObject);
        // Handle success here
        data = response.data;
        write_tokens(data);
    } catch (error) {
        console.log(error);
    }
}
async function register(e) {
    e.preventDefault();

    const formObject = process_form();

    try {
        const response = await fetch('student', 'post', formObject);
        // Handle success here
        data = response.data;
        write_tokens(data);
    } catch (error) {
        console.log(error);
    }
}
async function write_tokens(data) {
    const accessToken = data.accessToken;
    const refreshToken = data.refreshToken;

    // Send a request to the server to set the cookies
    await axios.post('/setToken', {
        accessToken: accessToken,
        refreshToken: refreshToken
    });

    // Add the token to headers for every future axios request
    axios.defaults.headers.common['Authorization'] = `Bearer ${accessToken}`;

    // Redirect to /home
    window.location.href = "/home";
}




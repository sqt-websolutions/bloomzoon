async function makeRequest(requestUrl='', reqData) {
   var result = axios.post(requestUrl, reqData).then(function(res){ 
       
        return res.data;
    },(error)=>{
        if (error.response) {
            // Request made and server responded
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            // The request was made but no response was received
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', error.message);
          }
    })
return result;

        
}

const inputFileElements = document.querySelectorAll('input[type=file]');
if(inputFileElements){
    const fileElements = [...inputFileElements];
    fileElements.forEach(fileElement => {
        fileElement.accept = ".jpg,.png,.jpeg,.pdf"
    })
}


const FormHandler =  (form,options) => {
    const formInputs = [...document.forms[form].elements];

    document.forms[form].addEventListener('submit', async e => {
        e.preventDefault();
        let formData = new FormData();

        formInputs.forEach( formInput => {
            if(formInput.value !== ''){
                if(formInput.type === 'file'){
                    formData.append(formInput.name, formInput.files[0]);
                }
                formData.append(formInput.name, formInput.value);
            }
        });
        
        if( options.requestUrl ) {
            
            let response = await makeRequest( options.requestUrl, formData );

            console.log(response);
            if(response == null){
                response = {}
            }
            options.cb(response)
        }
    })
};

const payWithPayStack = options => {
    ( _ => {
        let script = document.createElement('script');
        script.src = 'https://js.paystack.co/v1/inline.js';
        script.async = true;
        document.head.appendChild(script);
    })();

    setTimeout( _ => {
        return window.PaystackPop.setup({
            key: 'pk_test_09382aa6313abb13f39a4994ce801a2abfa26dd6',
            ...options
        }).openIframe();
    }, 1000);

};


async function makeRequest(requestUrl='', reqData) {
    return (await axios.post(requestUrl, reqData).catch(err => swal({text: 'Error Performing action', title: 'Error', icon:'error'}))).data;
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
            const response = await makeRequest( options.requestUrl, formData );
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


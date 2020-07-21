const dirname = 'super-admin';
const head_content = `
@extends('dashboard.${dirname}.layout')
@section('page_title')
    Fast Food & Groceries Dashboard
@endsection
`;

const front_head_content = `
@extends('layouts.front')
@section('page_title')
   Home
@endsection
`;

const getFormattedContent = content => {
    return `
        ${head_content}
        @section('content')
        ${content}
        @endsection
    `
};

const getHomeFormattedContent = content => {
    return `
        ${front_head_content}
        @section('content')
        ${content}
        @endsection
    `
};

const {parse} = require('node-html-parser');
const path = require('path');
const fs = require('fs');
const viewDirectoryPath = `resources/views/frontend`;
const directoryPath = path.join(__dirname, viewDirectoryPath);
fs.readdir(directoryPath, (err, files) => {
    files.forEach( file => {
            try {
                if(file !== '.DS_Store' && file !== '.idea' && file !=='layout.blade.php' && file !=='seller_asset'){
                    let filePath = directoryPath + '/' + file;
                    fs.readFile(filePath, (err, content) => {
                        if(!err){
                            let fileContent = content.toString();
                            if(fileContent){

                                let root = parse(fileContent);
                                if(root.childNodes[1]){
                                    try {

                                        root.childNodes[1].querySelector('head').set_content('');
                                        root.childNodes[1].querySelector('header').set_content('');
                                        root.childNodes[1].querySelector('footer').set_content('');
                                        // const template = getHomeFormattedContent(root.outerHTML);

                                        // const text = root.childNodes[1].querySelector('.col-md-10').outerHTML;
                                        // const template = getFormattedContent(text);

                                        fs.writeFile(filePath, root.outerHTML, (err) => {
                                            if(err) console.log('error writing file', err.message)
                                        })
                                    }catch (e) {
                                        console.log(e.message, + ' => ' + ' ' +  file);
                                    }

                                }
                            }
                        }

                    })
                }
            }catch (e) {
                console.log(file);
            }
    });
});

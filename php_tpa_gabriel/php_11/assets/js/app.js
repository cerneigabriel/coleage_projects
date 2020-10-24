// $("#quiz").submit(async function(event) {
//     event.preventDefault();
//     let action = $(this).attr('action');
//     let method = $(this).attr('method');
//     let _function_name = $(this).data('function-name');
//     let body = new FormData(this);

//     let response = await fetch(action, {
//         method: method,
//         headers: {
//             _function_name
//         },
//         body: body
//     });

//     response
//         .json()
//         .then(res => {
//             console.log(res);
//             // for (const [key, value] of Object.entries(res)) {
//             // }

//         }).catch(err => {
//             console.log(err);
//         });
// });
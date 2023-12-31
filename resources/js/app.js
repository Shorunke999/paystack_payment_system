import './bootstrap';
const form =document.getElementById('form')
form.addEventListener('submit', ()=>{
    const input =document.getElementById('search_input');
    const User_id=document.getElementById('user_id');
    let search_input = input.value;
    let useRId = User_id.value;
    axios.post('/search_user',{
        input: search_input,
        user_id:useRId
    });
})
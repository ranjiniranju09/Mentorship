<<<<<<< HEAD

import './bootstrap'; 

// var channel = Echo.channel('my-channel');
// channel.listen('.my-event', function(data) {
//   alert(JSON.stringify(data));
// });


const messageInput = document.getElementById('message-input');
const nameInput = document.getElementById('name-input');
const messageContainer = document.getElementById('message-container');
const messageCount = document.getElementById('count');
let totalMessages = 0;

window.Echo.channel('my-channel')
  .listen('.my-event', function(data) {
    // Determine the class based on whether the message is from the current user or not
    const messageClass = data.name === nameInput.value ? 'message-right' : 'message-left';

    // Append the received message to the message container with appropriate styling
    const messageDiv = document.createElement('div');
    messageDiv.classList.add(messageClass);
    messageDiv.innerHTML = `<strong>${data.name}:</strong> ${data.message}`;
    messageContainer.appendChild(messageDiv);
    
    // Update the message count
    totalMessages++;
    messageCount.textContent = totalMessages;
  });

messageInput.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    const message = messageInput.value;
    const name = nameInput.value; // Get the name from the input field

    // Send the message and name to the backend
    axios.post('/send-message', { message, name })
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error(error);
      });

    // Clear the input fields
    messageInput.value = '';
    nameInput.value = '';
  }
});
=======
require('./bootstrap');
>>>>>>> 0c87cc8 (mentor2)

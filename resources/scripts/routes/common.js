export default {
  init() {

      // Get all "navbar-burger" elements
      var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any nav burgers
      if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
          $el.addEventListener('click', function () {

            // Get the target from the "data-target" attribute
            var target = $el.dataset.target;
            var $target = document.getElementById(target);

            // Toggle the class on both the "navbar-burger" and the "navbar-menu"
            $el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

          });
        });
      }

let topicForm = document.querySelector('.bbp-topic-form');
      if (topicForm) {
      topicForm.classList.add('hidden');
      let button = document.createElement('button');
      button.innerHTML = 'Start a new topic';
      button.classList.add('button', 'is-primary');
      button.addEventListener('click', function() {
        topicForm.classList.toggle('hidden');
        button.classList.add('hidden');
      });
      topicForm.parentNode.insertBefore(button,topicForm );
    }

    let replyForm = document.querySelector('.bbp-reply-form');
      if (replyForm) {

       replyForm.classList.add('hidden');
      let buttonReply = document.createElement('button');
      buttonReply.innerHTML = 'Add a reply';
      buttonReply.classList.add('button', 'is-primary');
      buttonReply.addEventListener('click', function() {
        replyForm.classList.toggle('hidden');
        buttonReply.classList.add('hidden');
      });
      replyForm.parentNode.insertBefore(buttonReply,replyForm);
    }


  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    console.log('bar');

  },
};

import { CountUp } from 'CountUp.js';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    console.log('home');
    if ('IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype) {

      /*  countUp */
      var countOptions = {
        threshold: [.1,.65],
        rootMargin: '0px -40px',
      };

      var triggered = false;
      var progress = document.querySelector('.container--progress');

      var membersCount = new CountUp('figure-members', 178);
      var moneyCount = new CountUp('figure-money', 360);
      var homesCount = new CountUp('figure-homes', 16);

      var callback =  function(entries) {
        entries.forEach(entry => {
          if(entry.intersectionRatio >= .65 && !triggered) {
            membersCount.start();
            setTimeout(moneyCount.start(), 1000);
            setTimeout(homesCount.start(), 5000);
            triggered = true;
          }
        });
      }

      var countObserver = new IntersectionObserver(callback, countOptions);
      countObserver.observe(progress);
    }
  },
};

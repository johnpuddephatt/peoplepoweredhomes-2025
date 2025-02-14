import $ from 'jquery';

wp.customize('blogname', (value) => {
  value.bind(to => $('.brand').text(to));
});


wp.customize('address', (value) => {
  value.bind(to => $('.address').text(to));
});

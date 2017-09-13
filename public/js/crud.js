$('.opener').click(function () {
    FB.ui({
        method: 'feed',
        link: 'http://test.com/artists/function', // put the link here
        name: 'Bleh',
        caption: 'Blah',
        description: 'Testing!'
    });
});


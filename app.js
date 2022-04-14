const search = document.getElementById('search')

document.body.onload = function() {
    setTimeout((function() {
        let o = document.getElementById("page-preloader");
        o.classList.contains("done") || o.classList.add("done")
    }))
};

search.addEventListener('click', (e) => {
    e.preventDefault()
    search.classList.remove('inp-anim')
})
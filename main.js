
const navbar = document.getElementById("navbar");
const hero = document.getElementById('hero');

const sectionHeroOption = {
    rootMargin: "-100px 0px 0px 0px",
};

const sectionObserver = new IntersectionObserver(function (entries, sectionObserver) {
    entries.forEach(entry => {
        if (!entry.isIntersecting && entry.target.className == "hero") {
            console.log("testing")

            navbar.classList.add("scrolled");

        }
        else if (entry.target.className == "hero") {
            navbar.classList.remove("scrolled");
        }
    });
}, sectionHeroOption)

sectionObserver.observe(hero);

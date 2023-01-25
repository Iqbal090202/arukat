const handleDate = () => {
    let now = new Date();
    const optionsDate = {
        weekday: "long",
        year: "numeric",
        month: "short",
        day: "numeric",
    };
    const optionsTime = {
        hour: "2-digit",
        minute: "2-digit",
    };

    const dateNow = now.toLocaleDateString("id-ID", optionsDate);
    const timeNow = now.toLocaleTimeString("id-ID", optionsTime);

    $("#dateNow").text(dateNow);
    $("#timeNow").text(timeNow);

    setTimeout(handleDate, 1000);
};

(() => {
    handleDate();
})();

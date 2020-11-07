function dateFormatter(datevalue) {
    const date = new Date(datevalue);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();

    return `${day}-${month}-${year}`;
}

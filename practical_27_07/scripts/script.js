function triggerSomething() {
    // alert("Hello world");
    let b = 132;
}


function onInit() {
    let a = "test1234";
    triggerSomething();
    const person = { firstName: "", lastName: "" };
    changeSomething(person);
    alert("Hello " + person.firstName + " " + person.lastName);
}

function changeSomething(person) {
    person.firstName = prompt("Enter First Name");
    person.lastName = prompt("Enter Last Name");
}
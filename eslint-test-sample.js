// eslint-test-sample.js
// A grab-bag of common issues to sanity-check an ESLint config.

var unusedVar = 42;
let name = "Moon";
const age = 30;

function greet(user) {
  if (user == null) {
    console.log("no user provided");
    return;
  }
  return "Hello, " + user + "!";
}

function add(a, b) {
  return a + b;
}

const obj = {
  foo: 1,
  bar: 2,
  baz: function () {
    return this.foo + this.bar;
  },
};

class Person {
  constructor(name, age) {
    this.name = name;
    this.age = age;
  }
  greet() {
    return `Hi, I'm ${this.name}`;
  }
}

const arr = [1, 2, 3, 4, 5];
arr.forEach(function (item) {
  console.log(item);
});

const isEqual = 1 == "1";
const isStrictEqual = 1 === 1;

async function fetchData() {
  try {
    const res = await fetch("https://example.com/api");
    const data = await res.json();
    return data;
  } catch (e) {
    console.log(e);
  }
}

if (true) {
  var x = 10;
} else {
  var x = 20;
}

export default greet;
export { add, Person, fetchData };

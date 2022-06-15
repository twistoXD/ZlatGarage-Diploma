let users = [];

async function getUsers() {

    let response = await fetch("/admin/users/all");
    let data = await response.json();
    return data

}

async function getFilterUsers(role) {
    let response = await fetch(`/admin/users/filter/${role}`)
    console.log(response);
    let data = await response.json();
    console.log(data);
    return data.users;
}

function createRow({full_name, role, comments_count, id}) {
    let path = "/admin/users/edit/" + id;
    return `
            <tr>
                <td>${full_name} </td>
                <td>${role} </td>
                <td>${comments_count}</td>
                <td><a href="${path}" class="btn btn-sm btn-outline-primary">Подробно</a></td>
            </tr>`;

}

function clearContainer(container) {
    container.innerHTML = "";

}

function renderUsers(users) {
    let table = document.querySelector('#tableUsers');
    let res = '';
    users.forEach((user) => {

        res += createRow(user);
    });
    table.innerHTML = res;
}


async function loadUsersFilter(role = 0) {
    if (role == 0) {
        users = await getUsers();


    } else {
        users = await getFilterUsers(role);


    }
    document.querySelector('#countUsers').textContent = `Пользователей найдено:${users.length}`;
    console.log(users);

    return users;

}


async function start() {
    users = await loadUsersFilter();
    renderUsers(users);
}

function sortArray(array, property) {
    array.sort((item1, item2) => {
        if (item1[property] > item2[property]) return 1;
        if (item1[property] < item2[property]) return -1;
        return 0;
    })
}

let nameflag = true;
let commentflag = true;
document.querySelector('#orderName').addEventListener('click', (e) => {

    e.target.innerHTML = nameflag ? 'Sort &darr;' : 'Sort &uarr;';
    nameflag ? sortArray(users, 'full_name') : users.reverse();

    renderUsers(users);
    nameflag = !nameflag;
})
document.querySelector('#orderComment').addEventListener('click', (e) => {
    e.target.innerHTML = commentflag ? 'Sort &darr;' : 'Sort &uarr;';
    commentflag ? sortArray(users, 'comments_count') : users.reverse();
    renderUsers(users);
    commentflag = !commentflag;
})
document.querySelector('#orderRole').addEventListener('click', (e) => {
    e.target.innerHTML = commentflag ? 'Sort &darr;' : 'Sort &uarr;';
    commentflag ? sortArray(users, 'role') : users.reverse();
    renderUsers(users);
    commentflag = !commentflag;

})

document.querySelector('#roleSelector').addEventListener('change', async (e) => {
    let roleId = e.target.value;
    users = await loadUsersFilter(roleId);
    renderUsers(users);
})
start();

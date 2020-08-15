
const interval = setInterval(fetchUsers, 3000);
async function fetchUsers() {
    let response = await fetch('storage/users.json');
    let data = await response.text();
    data = JSON.parse(data);

    let mainArticle = document.getElementById('mainArticle');
    if (mainArticle.hasChildNodes()) {
        mainArticle.removeChild(mainArticle.childNodes[0]);
    }
    let table = document.createElement("TABLE");
    document.getElementById('mainArticle').appendChild(table);

    let header = table.createTHead(0);
    let headRow = header.insertRow(0);
    let nameCell = headRow.insertCell(0);
    let loginCell = headRow.insertCell(1);
    let IPCell = headRow.insertCell(2);
    let statuCell = headRow.insertCell(3);
    let lastUpdateCell = headRow.insertCell(4);

    nameCell.innerHTML = "<b>User Name</b>";
    loginCell.innerHTML = "<b>Login Time</b>";
    IPCell.innerHTML = "<b>IP</b>";
    statuCell.innerHTML = "<b>Status</b>";
    lastUpdateCell.innerHTML = "<b>Last Update</b>";

    for (let user of Object.values(data)) {

        let row = table.insertRow(1);
        let nameCell = row.insertCell(0);
        let loginCell = row.insertCell(1);
        let IPCell = row.insertCell(2);
        let statusCell = row.insertCell(3);
        let lastUpdateCell = row.insertCell(4);

        nameCell.innerText = user.name;
        loginCell.innerText = user.loginTime;
        IPCell.innerText = user.IP;
        statusCell.innerText = user.status;
        lastUpdateCell.innerText = new Date().toLocaleString();

        let createClickHandler = (row) => {
            return () => {
                document.getElementById("userAgent").innerText = 'User Agent : ' + row.userAgent;
                document.getElementById("registerTime").innerText = 'Register Time : ' + row.registerTime;
                document.getElementById("loginCount").innerText = 'Login Count : ' + row.loginCount;

                let modal = document.getElementById("myModal");
                modal.style.display = "block";

                let span = document.getElementsByClassName("close")[0];
                span.onclick = () => {
                    modal.style.display = "none";
                }

                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            };
        };

        row.onclick = createClickHandler(user);
    }
}

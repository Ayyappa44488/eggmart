const dataContainer = document.getElementById('dataContainer');

fetch('https://market.todaypricerates.com/Andhra-Pradesh-egg-rate')
  .then(response => response.json())
  .then(data => {
    // Process the scraped data
    // For example, if the response is an array of objects:
    data.forEach(item => {
      const listItem = document.createElement('li');
      listItem.textContent = item.name;
      dataContainer.appendChild(listItem);
    });
  })
  .catch(error => console.error(error));

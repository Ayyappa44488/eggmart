import requests
from bs4 import BeautifulSoup
from flask import Flask, render_template,jsonify

app = Flask(__name__)

@app.route('/')
def display_data():
    # Get the results from your Python code
    results = get_results()

    # Render the HTML template and pass the results as a variable
    return render_template('index.html', results=results)
def get_results():
    url = "https://market.todaypricerates.com/Andhra-Pradesh-egg-rate"
    response = requests.get(url)

    # Parse the HTML content
    soup = BeautifulSoup(response.content, "html.parser")

    # Find the relevant data on the page
    table = soup.find("table",class_="shop_table")

    # Check if the table is found
    if table is not None:
        rows = table.find_all("tr")     
        for row in rows:
            # Extract individual cells within each row
            cells = row.find_all("td")
            if cells:
                date = cells[2].text.strip()
                break
    price=float(date[2:])
    return price
@app.route('/api/results')
def api_results():
    # Get the results from your Python code
    results = get_results()

    # Return the results in JSON format
    return jsonify(results)


if __name__ == '__main__':
    app.run()

# Send an HTTP GET request to the website

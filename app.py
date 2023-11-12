import json
from flask import request
from flask import Flask, render_template
import mysql.connectors
from doesArticleExist import doesArticleExist

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('createArticle.html')

@app.route('/test', methods=['POST'])
def test():
    output = request.get_json()
    print(output)
    print(type(output))
    result = json.loads(output)
    print(result)
    print(type(result))

if __name__ == "__main__":
    app.run(debug=True)

@app.route('/<title>' methods=['GET', 'POST'])
def allow(title):
    response = "articleNotExist"
    isArticleExist = doesArticleExist(title)
    if isArticleExist == "articleExist":
        response = "articleDoesExist"
        pgTitle = "My Title"
        pgAuthor = "My author"
        pgDate = "My date"
        imgSrc = "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Double-alaskan-rainbow.jpg/1200px-Double-alaskan-rainbow.jpg"
        return render_template('template.html', title = pgTitle, author = pgAuthor, date = pgDate, imgSrc = imgLink)
    else:
        return redirect('/')








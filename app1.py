import numpy as np
from flask import Flask, request, jsonify, render_template
import pickle

# Create flask app
app1 = Flask(__name__)
model = pickle.load(open("model1.pkl", "rb"))

@app1.route("/")
def Home():
    return render_template("persona.html")

@app1.route("/predict", methods = ["POST"])
def predict():
    float_features = [float(x) for x in request.form.values()]
    features = [np.array(float_features)]
    prediction = model.predict(features)
    return render_template("index.html", prediction_text = "Your personality type is {}".format(prediction))

if __name__ == "__main__":
    app1.run(debug=True)

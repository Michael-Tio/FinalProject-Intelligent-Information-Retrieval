from selenium import webdriver
from selenium.webdriver.common.by import By
import sys
import json

keyCNN = sys.argv[1]

path = 'C:/Users/ASUS/Downloads/INSTALLER/chromedriver'
driver = webdriver.Chrome(executable_path = path)
driver.get('https://www.cnnindonesia.com/search/?query=' + keyCNN)

news = driver.find_elements(By.TAG_NAME, 'article')

newsList = []

for new in news:
    cnnTitle = new.find_element(By.CLASS_NAME, 'title')
    cnnDate = new.find_element(By.CLASS_NAME, 'date')
    cnnCategory = new.find_element(By.CLASS_NAME, 'kanal')
    if (cnnTitle.text != '' or cnnDate.text != '' or cnnCategory.text != ''):
        newsList.append([cnnTitle.text, cnnDate.text, cnnCategory.text])

print(json.dumps(newsList))
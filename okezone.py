from selenium import webdriver
from selenium.webdriver.common.by import By
import sys
import json

keyOkezone = sys.argv[1]

path = 'C:/Users/62821/Chromedriver/chromedriver'
driver = webdriver.Chrome(executable_path = path)
driver.get('https://search.okezone.com/search?q=' + keyOkezone + '&highlight=1&sort=desc&start=0')

news = driver.find_elements(By.CLASS_NAME, 'listnews')

newsList = []

for new in news:
    ozTitle = new.find_element(By.XPATH, './/div[@class="explan"]/div[@class="title"]/a').text
    ozDate = new.find_element(By.CLASS_NAME, 'tgl').text
    ozCategory = new.find_element(By.CLASS_NAME, 'kanal').text
    if (ozTitle != '' or ozDate != '' or ozCategory != ''):
        newsList.append([ozTitle, ozDate, ozCategory])

print(json.dumps(newsList))
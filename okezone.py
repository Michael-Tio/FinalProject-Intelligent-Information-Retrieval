from selenium import webdriver
from selenium.webdriver.common.by import By
import sys
import json
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager

keyOkezone = sys.argv[1]

path = 'https://unpkg.com/chromedriver@108.0.0/lib/chromedriver.js'
driver = webdriver.Chrome(executable_path = path, service = Service(ChromeDriverManager().install()))
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
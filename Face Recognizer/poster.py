import requests
import sys
import json

payload={
    'UserName': 'Hacker',
    'AadharCard_no': '12345645001',
    'ID_no': '786',
    'Phone_no': '9559692',
    'balance': '500',
    'submit': 'Submit'
    }

print type(payload)
r=requests.post('http://192.168.0.100/addinfo.php',data=payload)
print(r)
#with requests.Session(config={'verbose': sys.stderr}) as c:
   # c.post('http://192.168.0.100/addinfo.php',data=payload)

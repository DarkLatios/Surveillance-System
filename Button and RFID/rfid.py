import serial
from time import sleep
from subprocess import Popen, PIPE

ser = serial.Serial('/dev/ttyUSB0', 9600)
ser.setTimeout(1)


def main():
	while True:
		rfid = ser.read(20)
		print (rfid)
		print (int.from_bytes(rfid, byteorder='little'))


if __name__ == '__main__':
	main()

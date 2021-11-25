package com.irctc.trainmain.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;


@Entity
@Table(name="passanger")
public class Passanger {
	
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private int passanger_id;

	@Column(name="age")
	private int age;
	
	@Column(name="name")
	private String name;
	
	@Column(name="gender")
	private String gender;
	
	@Column(name="pnr")
	private String pnr;
	
	@Column(name="fair")
	private int fair;
	
	@Column(name="train_number")
	private String train_number;
	
	public String getTrain_number() {
		return train_number;
	}


	public void setTrain_number(String train_number) {
		this.train_number = train_number;
	}


	public Passanger() {}
	
	
	public Passanger( String train_number, int age, String name, String gender, String pnr, int fair) {
		super();
		this.train_number = train_number;
		this.age = age;
		this.name = name;
		this.gender = gender;
		this.pnr = pnr;
		this.fair = fair;
	}


	public static int getCalculatedFair(int age, String string, int ticket_price) {
		int _fair = ticket_price;
		if(string.equals("F")) {
			_fair = _fair - ((int)_fair/4);
		}else {
			if(age > 0 && age <= 12) {
				_fair = _fair - ((int)_fair/2);
			}else if(age >= 60) {
				_fair = _fair - ((int)_fair*6/10);
			}
		}
		return _fair;
	}

	public int getFair() {
		return fair;
	}

	public void setFair(int fair) {
		this.fair = fair;
	}
	
	public int getAge() {
		return age;
	}
	public void setAge(int age) {
		this.age = age;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getGender() {
		return gender;
	}
	public void setGender(String gender) {
		this.gender = gender;
	}
	public String getPnr() {
		return pnr;
	}
	public void setPnr(String pnr) {
		this.pnr = pnr;
	}
	
}

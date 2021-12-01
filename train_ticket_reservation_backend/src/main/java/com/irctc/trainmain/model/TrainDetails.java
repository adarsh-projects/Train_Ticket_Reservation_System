package com.irctc.trainmain.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="traindetails")
public class TrainDetails {
	
	@Id
	@Column(name="train_number")
	private String train_number;
	
	@Column(name="depart_date")
	private String depart_date;
	
	@Column(name="arrive_date")
	private String arrive_date;
	
	@Column(name="arrive_time")
	private String arrive_time;
	
	@Column(name="depart_time")
	private String depart_time;
	
	@Column(name="runs_on")
	private String runs_on;

	public String getTrain_number() {
		return train_number;
	}

	public void setTrain_number(String train_number) {
		this.train_number = train_number;
	}

	public String getDepart_date() {
		return depart_date;
	}

	public void setDepart_date(String depart_date) {
		this.depart_date = depart_date;
	}

	public String getArrive_date() {
		return arrive_date;
	}

	public void setArrive_date(String arrive_date) {
		this.arrive_date = arrive_date;
	}

	public String getArrive_time() {
		return arrive_time;
	}

	public void setArrive_time(String arrive_time) {
		this.arrive_time = arrive_time;
	}

	public String getDepart_time() {
		return depart_time;
	}

	public void setDepart_time(String depart_time) {
		this.depart_time = depart_time;
	}

	public String getRuns_on() {
		return runs_on;
	}

	public void setRuns_on(String runs_on) {
		this.runs_on = runs_on;
	}
	public TrainDetails() {}
	public TrainDetails(String train_number, String depart_date, String arrive_date, String arrive_time,
			String depart_time, String runs_on) {
		super();
		this.train_number = train_number;
		this.depart_date = depart_date;
		this.arrive_date = arrive_date;
		this.arrive_time = arrive_time;
		this.depart_time = depart_time;
		this.runs_on = runs_on;
	}
	
	
}

package com.irctc.trainmain.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="train")
public class Train {
	
	@Id
	@Column(name="train_number")
	private String train_number;
	
	@Column(name="ticket_price")
	private int ticket_price;
	
	@Column(name="source")
	private String source;
	
	@Column(name="st_date")
	private String st_date;
	
	@Column(name="destination")
	private String destinations;

	@Column(name="train_name")
	private String train_name;
	
	public String getSt_date() {
		return st_date;
	}

	public void setSt_date(String st_date) {
		this.st_date = st_date;
	}

	
	public Train(){}
	
	public Train(String train_number, int ticket_price, String source, String destinations, String train_name, String st_date) {
		super();
		this.train_number = train_number;
		this.ticket_price = ticket_price;
		this.source = source;
		this.destinations = destinations;
		this.train_name = train_name;
		this.st_date = st_date;
	}
	public String getTrain_name() {
		return train_name;
	}

	public void setTrain_name(String train_name) {
		this.train_name = train_name;
	}

	public String getTrain_number() {
		return train_number;
	}
	public void setTrain_number(String train_number) {
		this.train_number = train_number;
	}
	public int getTicket_price() {
		return ticket_price;
	}
	public void setTicket_price(int ticket_price) {
		this.ticket_price = ticket_price;
	}
	public String getSource() {
		return source;
	}
	public void setSource(String source) {
		this.source = source;
	}
	public String getDestinations() {
		return destinations;
	}
	public void setDestinations(String destinations) {
		this.destinations = destinations;
	}

}

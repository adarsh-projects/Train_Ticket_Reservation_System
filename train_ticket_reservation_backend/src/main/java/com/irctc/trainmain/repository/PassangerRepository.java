package com.irctc.trainmain.repository;


import org.springframework.data.jpa.repository.JpaRepository;

import com.irctc.trainmain.model.Passanger;

public interface PassangerRepository extends JpaRepository<Passanger, String>{
	
}
